set :application, "MCSAdmin"
set :repository,  "git@github.com:robbiet480/MCSAdmin.git"
# If you aren't deploying to /u/apps/#{application} on the target
# servers (which is the default), you can specify the actual location
# via the :deploy_to variable:
set :deploy_to, "/var/www/"
# If you aren't using Subversion to manage your source code, specify
# your SCM below:
set :scm, :git
role :app, "67.228.153.12"
role :web, "67.228.153.12"
set :use_sudo, false
set :user, "root"
set :password, "DC91652D1695606F425FBDAA017E357DC4026DD3CFF04D49CCCB94BCC583BFFA"

namespace:deploy do
    task:start do
    end
    task:stop do
    end
    task:finalize_update do
    end
    task:restart do
	run "chown -R www-data:www-data /var/www"
    end
end
