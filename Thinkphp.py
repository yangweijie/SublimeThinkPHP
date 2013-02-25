# -*- coding: utf-8 -*-
import sublime, sublime_plugin
import os, httplib, urllib, urllib2, json, webbrowser, threading, codecs, time

settings = sublime.load_settings('Thinkphp.sublime-settings')
api_root_url = 'doc.thinkphp.cn'
packages_path = sublime.packages_path() + os.sep +'Thinkphp'
manual_dir = settings.get('manual_dir')

def fs_reader(path):
	return codecs.open(path, mode='r', encoding='utf-8').read()

def fs_writer(path, raw):
	codecs.open(path, mode='w', encoding='gbk', errors='ignore').write(raw)

def out_tpl(new,name,sub=''):
	if sub == '':
		return tpl.replace('{%ROOT}', '.').replace('{%title}',name).replace('{%s}',new)
	else:
		return tpl.replace('{%ROOT}', '..').replace('{%title}',name).replace('{%s}',new)

def get_tpl_fullpath(filename,parent_dir=''):
	return packages_path + os.sep + manual_dir + os.sep + parent_dir + filename + '.html'

def write_tpl(filename,content,parent_dir=''):
	# if not os.path.isfile(get_tpl_fullpath(filename,parent_dir)):
	fs_writer(get_tpl_fullpath(filename,parent_dir),content)

def open_tab(url):
	webbrowser.open_new_tab(url)

def get_content(id,name,parent_dir=''):
	conn = httplib.HTTPConnection(api_root_url)
	conn.request("GET", "/api/view/"+id)
	r1 = conn.getresponse()
	data1 = r1.read()
	data1 = json.loads(data1)
	data = data1['data']
	content = ''
	if data != None:
		for i in data:
			content = content + i['content']
	else:
		print id+',';
	if parent_dir == '':
		return out_tpl(content,name)
	else:
		return out_tpl(content,name,1)

tpl = fs_reader(os.path.join(packages_path + os.sep+ manual_dir +os.sep+'public', 'book.tpl'))

class ThinkphpCommand(sublime_plugin.TextCommand):

	def see(self,id,name,parent_dir=''):
		#url = 'http://doc.thinkphp.cn/manual/' + self.data[arg]['name']
		# content = get_content(id,name,parent_dir)
		# write_tpl(name,content,parent_dir)
		self.build(id,name,parent_dir)
		path = get_tpl_fullpath(name,parent_dir)
		url = 'file:///'+urllib.quote(path.encode('utf8'))
		open_tab(url)

	def build(self,id,name,parent_dir=''):
		content = get_content(id,name,parent_dir)
		write_tpl(name,content,parent_dir)

	def del_bom(self,dir):
		file_count = 0
		bom_files  = []
		self.view.window().run_command("show_panel", {"panel":"console", "toggle": None})
		for dirpath, dirnames, filenames in os.walk(dir):
			if(len(filenames)):
				for filename in filenames:
					file_count += 1
					file = open(dirpath + "/" + filename, 'r+')
					file_contents = file.read()
	   
					if(len(file_contents) > 3):
						if(ord(file_contents[0]) == 239 and ord(file_contents[1]) == 187 and ord(file_contents[2]) == 191):
							bom_files.append(dirpath + "/" + filename)
							file.seek(0)
							file.write(file_contents[3:])
							print dirpath + "/" + filename, "BOM found. Deleted."
					file.close()
		print file_count, "file(s) found.", len(bom_files), "file(s) have a bom. Deleted."

	def run(self, edit):
		data = self._init()
		self.data = data
		chapter = []
		tree = []
		sort_data = []
		k = 0
		for i in data:
			chapter.insert(int(i['id']),i['title'])
			sort_data.insert(k,i['title'])
			state = i.get('_child', None)
			if state:
				tree.insert(k,i['_child'])
			else:
				tree.insert(k,None)
			k = k+1
		# print chapter
		self.chapter = chapter
		self.sort_data = sort_data
		self.tree = tree
		self.view.window().show_quick_panel(chapter, self.panel_done)

	def panel_done(self,arg):
		if arg == -1:
			pass
		else:
			self.tree_key = arg
			if self.tree[arg] == None:
				self.see(self.data[arg]['id'],str(arg)+'.'+self.data[arg]['title'])
			else:
				parent_dir = packages_path+os.sep+manual_dir+os.sep+str(arg)+'.'+self.sort_data[arg]
				if not os.path.isdir(parent_dir):
					os.mkdir(parent_dir)
				child =[]
				k = 0
				for i in self.tree[arg]:
					child.insert(k,i['title'])
					k +=1
				self.view.window().show_quick_panel(child, self.child_done)

	def child_done(self,arg):
		if arg == -1:
			self.view.window().show_quick_panel(self.chapter, self.panel_done)
		else:
			self.see(self.tree[self.tree_key][arg]['id'],str(self.tree_key)+'.'+str(arg)+' '+self.tree[self.tree_key][arg]['title'],str(self.tree_key)+'.'+self.sort_data[self.tree_key]+os.sep)

	def view_api(self):
		url = settings.get('api_url')
		open_tab(url)

	def _init(self):
		conn = httplib.HTTPConnection(api_root_url)
		conn.request("GET", "/api")
		r1 = conn.getresponse()
		data1 = r1.read()
		data1 = json.loads(data1)
		return data1['data']

	def search_panel(self):
		self.view.window().show_input_panel('search in thinkphp manual?', '', self.search_done, self.search_change, self.search_cancel)
	
	def search_done(self,arg):
		data = {'keywords' : arg}
		f = urllib2.urlopen(url = 'http://' + api_root_url + '/api/search',data = urllib.urlencode(data))
		data = f.read()
		data = json.loads(data)
		if data['data'] == []:
			sublime.error_message('No Search result !')
		else:
			chapter = []
			data = data['data']
			self.search_list = data
			for i in data:
				chapter.insert(int(i['id']),i['title'])
			self.view.window().show_quick_panel(chapter, self.manual_search_done)

	def manual_search_done(self,arg):
		if arg == -1:
			pass
		else:
			choose = self.search_list[arg]
			data = self._init()
			for i in data:
				if i['id'] == choose['id']:
					self.see(choose['id'], choose['title'],'_search'+os.sep)
				else:
					state = i.get('_child', None)
					if state:
						for j in i['_child']:
							if j['id'] == choose['id']:
								if not os.path.isdir(packages_path + os.sep + manual_dir + os.sep+i['title']):
									os.mkdir(packages_path + ose.sep+ manual_dir + os.sep +i['title'])
								self.see(choose['id'], choose['title'], '_search'+os.sep)

	def search_change(self,arg):
		pass 

	def search_cancel(self):
		pass  

	def cloums(self,arg):
		self.show_cloums(arg)

	def cloums_panel(self):
		self.view.window().show_input_panel('table you want show?', '', self.show_cloums, self.search_change, self.search_cancel)  

	def show_cloums(self,arg):
		table = arg
		self.table = table
		dir = self.view.window().folders()
		if dir == []:
			sublime.error_message('Please open a full ThinkPHP project')
		else:
			cfg_files  = []
			for dirpath, dirnames, filenames in os.walk(dir[0]):
				if(len(filenames)):
					for filename in filenames:
						if (filename == 'config.php'):
							cfg_files.append([filename,dirpath + "/" + filename])
			if(len(cfg_files)):
				self.cfg_files = cfg_files
				self.view.window().show_quick_panel(cfg_files, self.choose_conf)
			else:
				sublime.error_message('no config.php')

	def choose_conf(self,arg):
		config_file = self.cfg_files[arg][1]
		command_text = "php '" + packages_path+"/command.php' 'show_colums_after_connected_from_file' '"+ config_file + "' '" + self.table + "'"
		cloums = os.popen(command_text)
		data = json.loads(cloums.read())
		if(data['status'] == 0):
			sublime.error_message(data['info'])
		else:
			cloums = []
			for i in data['data']:
				cloums.append([i['Field'],i['Type'],i['Comment']])
			self.view.window().show_quick_panel(cloums, self.search_cancel)

class del_workspace_boms(ThinkphpCommand,sublime_plugin.TextCommand):
	def run(self, edit):
		dir = self.view.window().folders()
		if dir == []:
			sublime.error_message('Please open a folder')
		else:
			self.del_bom(dir[0])

class update_thinkphp_manual(ThinkphpCommand,sublime_plugin.TextCommand):
	def run(self, edit):
		manual_path = packages_path + os.sep + manual_dir + os.sep
		thread = updateManual(manual_path)
		thread.start()
		ThreadProgress(thread, 'Is making ThinkPHP manual','ThinkPHP manual generated!')

class update_thinkphp_manual_with_php(ThinkphpCommand,sublime_plugin.TextCommand):
	def run(self, edit):
		# self.update_manual_with_php()
		command_text = "php -d 'extension=php_curl.dll' '" + packages_path + os.sep + "command.php' 'update_manual' '"+ packages_path + os.sep + manual_dir + "' '" + api_root_url + "'"
		thread = updateManualWithPhp(command_text)
		thread.start()
		ThreadProgress(thread, 'Is making ThinkPHP manual','ThinkPHP manual generated!')

class show_cloums_by_word(ThinkphpCommand,sublime_plugin.TextCommand):
	def run(self, edit):
		region = self.view.sel()[0]
		if region.begin() != region.end():
			self.cloums(self.view.substr(region))
		else:
			self.cloums_panel()

class search_word_thinkphp_manual(ThinkphpCommand,sublime_plugin.TextCommand):
	def run(self, edit):
		region = self.view.sel()[0]
		if region.begin() != region.end():
			self.search_done(self.view.substr(region))
		else:
			self.search_panel()

class search_thinkphp_manual(ThinkphpCommand,sublime_plugin.TextCommand):
	def run(self, edit):
		self.search_panel()

class view_thinkphp_api_manual(ThinkphpCommand,sublime_plugin.TextCommand):
	"""see the ThinkPHP api online"""
	def run(self, arg):
		self.view_api()

class updateManual(threading.Thread):
	def __init__(self,manual_path):
		self.manual_path = manual_path
		threading.Thread.__init__(self)
		conn = httplib.HTTPConnection(api_root_url)
		conn.request("GET", "/api")
		r1 = conn.getresponse()
		data1 = r1.read()
		data1 = json.loads(data1)
		self.data =  data1['data']
	def run(self):
		data = self.data
		i=0
		for j in data:
			if not j.get('_child', None):
				self.build(j['id'], str(i)+'.'+j['title'])
			else:
				parent_dir = str(i)+'.'+j['title']
				if not os.path.isdir(self.manual_path+parent_dir):
					os.mkdir(self.manual_path+parent_dir)
				k = 1
				for t in j['_child']:
					sublime.set_timeout(self.build(t['id'],str(i)+'.'+str(k)+' '+t['title'],parent_dir+ os.sep),1)
					k = k+1
			i = i+1
		sublime.message_dialog('The manual generated!')

	def build(self,id,name,parent_dir=''):
		content = get_content(id,name,parent_dir)
		write_tpl(name,content,parent_dir)	

class updateManualWithPhp(threading.Thread):
	def __init__(self,command_text):
		self.command_text = command_text;
		threading.Thread.__init__(self)
	def run(self):
		cloums = os.popen(self.command_text)
		# print cloums.read()
		data = json.loads(cloums.read())
		if(data['status'] == 0):
			sublime.message_dialog(data['info'])
		else:
			sublime.error_message(data['info'])

class ThreadProgress():
	"""
	Animates an indicator, [=   ], in the status area while a thread runs

	:param thread:
		The thread to track for activity

	:param message:
		The message to display next to the activity indicator

	:param success_message:
		The message to display once the thread is complete
	"""

	def __init__(self, thread, message, success_message):
		self.thread = thread
		self.message = message
		self.success_message = success_message
		self.addend = 1
		self.size = 8
		sublime.set_timeout(lambda: self.run(0), 100)

	def run(self, i):
		if not self.thread.is_alive():
			if hasattr(self.thread, 'result') and not self.thread.result:
				sublime.status_message('')
				return
			sublime.status_message(self.success_message)
			return

		before = i % self.size
		after = (self.size - 1) - before

		sublime.status_message('%s [%s=%s]' % \
			(self.message, ' ' * before, ' ' * after))

		if not after:
			self.addend = -1
		if not before:
			self.addend = 1
		i += self.addend

		sublime.set_timeout(lambda: self.run(i), 100)