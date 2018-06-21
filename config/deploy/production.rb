set :application, 'brassbandfribourg.ch'

set :stage, :production
set :branch, :master

set :deploy_to, -> { "/home/jminguely/www/#{fetch(:application)}" }

# Extended Server Syntax
# ======================
server 'ssh-jminguely.alwaysdata.net', user: 'jminguely', roles: %w{web app db}

before "styleguide:deploy_build", "styleguide:build_local"

fetch(:default_env).merge!(wp_env: :staging)

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"
