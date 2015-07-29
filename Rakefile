require 'rubygems'
require 'rake'
require 'rdoc'
require 'date'
require 'yaml'
require 'tmpdir'
require 'jekyll'
require 's3_website'

task :default => :server

desc 'Build site with Jekyll'
task :build do
  system 'bundle exec jekyll build --config _config.yml,_production.yml'
end

desc 'Build and start local server'
task :serve do
  system 'bundle exec jekyll serve -w'
end

desc "Generate and publish site to atsid.com on Amazon S3."
task :publish => [:build] do
  system 'S3_BUCKET=atsid.com bundle exec s3_website push'
end

desc "Generate and publish site to stage.atsid.com on S3."
task :stage => [:build] do
  system 'S3_BUCKET=stage.atsid.com bundle exec s3_website push'
end
