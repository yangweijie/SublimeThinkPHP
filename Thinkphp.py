# -*- coding: utf-8 -*-
import sublime, sublime_plugin
import os, json, threading, codecs, subprocess, webbrowser
from subprocess import PIPE

packages_path = sublime.packages_path() + os.sep + 'Thinkphp'
query_window = packages_path + os.sep + 'ThinkPHP-CLI.html'
query_table = packages_path + os.sep + 'ThinkPHP-Queryer'
seperator = '\n###################################################\n\n'
settings = sublime.load_settings('Thinkphp.sublime-settings')

def fs_reader(path):
    return codecs.open(path, mode='r', encoding='utf8').read()

def fs_writer(path, raw):
    codecs.open(path, mode='w', encoding='utf8', errors='ignore').write(raw)

def open_tab(url):
    webbrowser.open_new_tab(url)

class ThinkphpCommand(sublime_plugin.TextCommand):
    def run(self, edit):
        window = sublime.active_window()
        views = window.views()
        view = None
        for _view in views:
            if _view.name() == 'ThinkPHP-CLI.html':
                view = _view
                break
        if not view:
            tpl = seperator + 'result to be display.'
            fs_writer(query_window, tpl)
        self.view.window().open_file(query_window)

    def view_api(self):
        url = settings.get('api_url')
        open_tab(url)

class Thinkphp(sublime_plugin.EventListener):
    def on_post_save(self, view):
        dir = view.window().folders()
        if dir == []:
            sublime.error_message('Please open a folder')
        else:
            content = view.substr(sublime.Region(0, view.size()))
            title = "ThinkPHP-CLI.html"
            if view.file_name().find(title) != -1:
                global seperator
                query = content.split(seperator)
                cmd = query[0]
                command_text = ['php', dir[0] + os.sep + 'index.php', cmd]
                thread = cli(command_text,view,dir[0])
                thread.start()
                ThreadProgress(thread, 'Is excuting', 'cli excuted')
            else:
                title2 = "ThinkPHP-Queryer"
                if view.file_name().find(title2) != -1:
                    seperator = """##########################################################################"""
                    query = content.split(seperator)
                    if len(query) == 2:
                        sql = query[0]
                        if sql == '':
                            sublime.status_message('Pls input correct sql')
                        else:
                            command_text = 'php "' + packages_path + os.sep + 'command.php" "query"'
                            thread = queryWithPhp(command_text)
                            thread.start()
                            ThreadProgress(thread, 'Is querying', 'Database query complated!')
                    else:
                        sublime.status_message('Error format queryer, pls close it the retry query')


class query_database(ThinkphpCommand, sublime_plugin.TextCommand):
    def run(self, edit, cmd):
        self.cmd = cmd
        if cmd == 'change_database':
            self.list_database()
        else:
            current_database = fs_reader(packages_path + os.sep + 'current_database')
            if current_database < '1':
                self.list_database()
            else:
                if cmd == 'show_cloum':
                    self.show_cloum()
                else:
                    self.show_query_database()


    def show_cloum(self):
        region = self.view.sel()[0]
        if region.begin() != region.end():
            table = self.view.substr(region)
            command_text = 'php "' + packages_path + os.sep + 'command.php" "show_colums" "' + table + '"'
            cloums = os.popen(command_text)
            data = json.loads(cloums.read())
            if(data['status'] == 0):
                sublime.error_message(data['info'])
            else:
                cloums = []
                for i in data['data']:
                    cloums.append([i['Field'], i['Type'], i['Comment']])
                self.view.window().show_quick_panel(cloums, self.cancel)
        else:
            sublime.error_message('Pls choose your table')

    def cancel(self,arg):
        pass

    def list_database(self):
        database = []
        db_list = settings.get('database')
        for i in db_list:
            database.insert(int(i), db_list[i]['list_title'])
        self.database = database
        self.view.window().show_quick_panel(database, self.choose_database)

    def choose_database(self, arg):
        if arg == -1:
            pass
        else:
            db_num = len(settings.get('database'))
            if arg == 0:
                setting_file = packages_path + os.sep + 'Thinkphp.sublime-settings'
                new_key = '%d' % db_num
                tpl = '"' + new_key + '":' + """{
            "list_title":"test",
            "DB_HOST": "localhost",
            "DB_USER": "xxx",
            "DB_PWD": "xxx",
            "DB_NAME": "xx",
            "DB_PREFIX": ""
        }
"""
                sublime.set_clipboard(tpl)
                self.view.window().open_file(setting_file)
            else:
                fs_writer(packages_path + os.sep + 'current_database', str(arg))
                if self.cmd == 'show_cloum':
                    self.show_cloum()

    def show_query_database(self):
        window = sublime.active_window()
        views = window.views()
        view = None
        for _view in views:
            if _view.name() == 'ThinkPHP-Queryer':
                view = _view
                break

        if not view:
            tpl = """

##########################################################################

result to be display.
"""
            fs_writer(query_table, tpl)
            self.view.window().open_file(query_table)

class goto_php_document(ThinkphpCommand, sublime_plugin.TextCommand):
    def run(self, edit):
        region = self.view.sel()[0]
        if region.begin() != region.end():
            function = self.view.substr(region)
            command_text = 'php "' + packages_path + os.sep + 'command.php" "find_php_defination" "' + function + '"'
            cloums = os.popen(command_text)
            data = json.loads(cloums.read())
            if data['status'] == 0:
                sublime.status_message(data['info'])
            else:
                window = sublime.active_window()
                views = window.views()
                view = None
                for _view in views:
                    if _view.name() == ('function "%s" defination(php)') % function:
                        view = _view
                        break

                if not view:
                    view = window.new_file()
                    view.set_name(('function "%s" defination(php)') % function)
                    view.set_scratch(True)

                def write(string):
                    edit = view.begin_edit()
                    if view.size() == 0:
                        view.insert(edit, view.size(), string)
                        view.end_edit(edit)

                write(data['data'])
        else:
            sublime.status_message('must be a word')

class view_thinkphp_api_manual(ThinkphpCommand, sublime_plugin.TextCommand):
    """see the ThinkPHP api online"""
    def run(self, arg):
        self.view_api()

class cli(threading.Thread):
    def __init__(self, command_text, view,cwd):
        self.command_text = command_text
        self.view = view
        self.cwd  = cwd
        threading.Thread.__init__(self)

    def run(self):
        proce = subprocess.Popen(self.command_text, stdout=PIPE, shell=True, cwd=self.cwd)
        data,error = proce.communicate()
        if data != b'':
            content = self.command_text[2] + seperator + data.decode('utf-8')
            fs_writer(query_window, content)
        else:
            if sublime.version() < '3000':
                sublime.error_message('cli executed!')

class queryWithPhp(threading.Thread):
    def __init__(self, command_text):
        self.command_text = command_text
        threading.Thread.__init__(self)

    def run(self):
        cloums = os.popen(self.command_text)
        data = cloums.read()
        if data:
            sublime.error_message(data)
        else:
            if sublime.version() < '3000':
                sublime.error_message('query complated!')

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

        sublime.status_message('%s [%s=%s]' % (self.message, ' ' * before, ' ' * after))

        if not after:
            self.addend = -1
        if not before:
            self.addend = 1
        i += self.addend

        sublime.set_timeout(lambda: self.run(i), 100)