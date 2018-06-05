namespace :styleguide do
  task :defaults do
    set :build_path, 'build'
    set :app_path, 'web/app'
  end

  desc "Build assets locally"
  task :build do
    run_locally do
      execute 'npm', '--no-spin', '--silent', 'install'
      execute './node_modules/.bin/gulp', 'build'
    end
  end

  desc "Push build to server"
  task :deploy_build do
    on roles(:web) do
        upload! fetch(:app_path) + '/' + fetch(:theme_path) + '/' + fetch(:build_path), release_path.join(fetch(:app_path)).join(fetch(:theme_path)).join(fetch(:build_path)), recursive: true
    end
  end
end
