import sys
import os

package_name = 'ThinkPHP5_0'
packages_path = os.path.split(os.path.realpath(__file__))[0]
command_bin = packages_path + os.sep + 'tp5' + os.sep + 'public' + os.sep + 'index.php';

def plugin_loaded():
	from package_control import events

	if events.install(package_name):
		print('Installed %s!' % events.install(package_name))
		global command_bin
		command_text = 'php "' + command_bin + '" index/index/build_completion'
		print(command_text)
		cloums = os.popen(command_text)
		print(cloums.read())
	elif events.post_upgrade(package_name):
		print('Upgraded to %s!' % events.post_upgrade(package_name))


def plugin_unloaded():
	from package_control import events

	if events.pre_upgrade(package_name):
		print('Upgrading from %s!' % events.pre_upgrade(package_name))
	elif events.remove(package_name):
		print('Removing %s!' % events.remove(package_name))


# Compat with ST2
if sys.version_info < (3,):
	plugin_loaded()
	unload_handler = plugin_unloaded