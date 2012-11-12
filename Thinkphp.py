# -*- coding: utf-8 -*-
import sublime, sublime_plugin
import  os,httplib,urllib,urllib2,json,webbrowser,codecs

def fs_reader(path):
	return codecs.open(path, mode='r', encoding='utf8').read()

def fs_writer(path, raw):
	codecs.open(path, mode='w', encoding='utf8').write(raw)

def out_tpl(new,sub=''):
	if sub == '':
		return tpl.replace('{%s}',new)
	else:
		return tpl2.replace('{%s}',new)

def get_tpl_fullpath(filename,parent_dir=''):
	return packages_path + '\\manual\\' + parent_dir + filename+'.html'

def write_tpl(filename,content,parent_dir=''):
	if not os.path.isfile(get_tpl_fullpath(filename,parent_dir)):
		fs_writer(get_tpl_fullpath(filename,parent_dir),content)

def open_tab(url):
	webbrowser.open_new_tab(url)

def get_content(id,parent_dir=0):
	conn = httplib.HTTPConnection("doc.thinkphp.cn")
	conn.request("GET", "/api/view/"+id)
	r1 = conn.getresponse()
	data1 = r1.read()
	data1 = json.loads(data1)
	data = data1['data']
	content = ''
	for i in data:
		content= content + i['content']
	if parent_dir == 0:
		return out_tpl(content)
	else:
		return out_tpl(content,1)

packages_path = sublime.packages_path() + '\\thinkphp'
tpl = fs_reader(os.path.join(packages_path + '\\manual\\public', 'book.tpl'))
tpl2 = fs_reader(os.path.join(packages_path + '\\manual\\public', 'book_sub.tpl'))

class ThinkphpCommand(sublime_plugin.TextCommand):

	def see(self,id,name,parent_dir=''):
		#url = 'http://doc.thinkphp.cn/manual/' + self.data[arg]['name']
		content = get_content(id,parent_dir)
		write_tpl(name,content,parent_dir)
		url = 'file://'+get_tpl_fullpath(name,parent_dir)
		open_tab(url)

	def build(self,id,name,parent_dir=''):
		content = get_content(id,parent_dir)
		write_tpl(name,content,parent_dir)

	def run(self, edit):
		data = self._init()
		self.data = data
		chapter = []
		tree = []
		sort_data = []
		k = 0
		for i in data:
			chapter.insert(int(i['id']),i['title'])
			sort_data.insert(k,i['name'])
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
				self.see(self.data[arg]['id'],self.data[arg]['name'])
			else:
				if not os.path.isdir(packages_path + '\\manual\\'+self.sort_data[arg]):
					os.mkdir(packages_path + '\\manual\\'+self.sort_data[arg])
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
			self.see(self.tree[self.tree_key][arg]['id'],self.tree[self.tree_key][arg]['name'],self.sort_data[self.tree_key]+'\\')

	def _init(self):
		conn = httplib.HTTPConnection("doc.thinkphp.cn")
		conn.request("GET", "/api")
		r1 = conn.getresponse()
		data1 = r1.read()
		data1 = json.loads(data1)
		return data1['data']

	def update_manual(self):
		data = self._init()
		for j in data:
			if not j.get('_child', None):
				self.build(j['id'], j['name'])
			else:
				parent_dir = j['name']
				if not os.path.isdir(packages_path + '\\manual\\'+j['name']):
					os.mkdir(packages_path + '\\manual\\'+j['name'])
				for t in j['_child']:
					sublime.set_timeout(self.build(t['id'],t['name'],parent_dir+'\\'),100)
		sublime.status_message('the manual has been generated')

	def search_panel(self):
		self.view.window().show_input_panel('search in thinkphp manual?', '', self.search_done, self.search_change, self.search_cancel)

	def search_done(self,arg):
		data = {'keywords' : arg}
		f = urllib2.urlopen(url = 'http://doc.thinkphp.cn/api/search',data = urllib.urlencode(data))
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
					self.see(choose['id'], choose['name'])
				else:
					state = i.get('_child', None)
					if state:
						for j in i['_child']:
							if j['id'] == choose['id']:
								if not os.path.isdir(packages_path + '\\manual\\'+i['name']):
									os.mkdir(packages_path + '\\manual\\'+i['name'])
								self.see(choose['id'], choose['name'], i['name']+'\\')

	def search_change(self,arg):
		pass 

	def search_cancel(self):
		pass		

class update_thinkphp_manual(ThinkphpCommand,sublime_plugin.TextCommand):
    def run(self, edit):
       self.update_manual()

class search_thinkphp_manual(ThinkphpCommand,sublime_plugin.TextCommand):
    def run(self, edit):
       self.search_panel()