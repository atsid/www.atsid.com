wordpress-packages:
  pkg.installed:
    - pkgs:
      - python-mysqldb
      - php5-mysql

wordpress-database:
  mysql_database.present:
    - name: {{ salt['pillar.get']('wordpress:wp-database', 'wpdb')  }}
    - require:
      - pkg: wordpress-packages
  mysql_user.present:
    - name: {{ salt['pillar.get']('wordpress:wp-username', 'wupuser') }}
    - host: localhost
    - password: {{ salt['pillar.get']('wordpress:wp-passwords', 'wppass') }}
    - require:
      - pkg: wordpress-packages
  mysql_grants.present:
    - database: {{ salt['pillar.get']('wordpress:wp-database', 'wpdb') }}.*
    - grant: all privileges
    - user: {{ salt['pillar.get']('wordpress:wp-username', 'wupuser') }}
    - host: localhost
    - require:
      - mysql_database: {{ salt['pillar.get']('wordpress:wp-database', 'wpdb') }}
      - mysql_user: {{ salt['pillar.get']('wordpress:wp-username', 'wupuser') }}

wordpress:
  archive.extracted:
    - name: /var/www/html
    - source: http://wordpress.org/wordpress-4.1.tar.gz
    - source_hash: md5=5adac1bfc61b793a1ca9bcb4d67b4d28
    - archive_format: tar
    - archive_user: root
    - if_missing: /var/www/html/wordpress


# get-wordpress:
#   cmd.run:
#     - name: 'curl -O http://wordpress.org/latest.tar.gz && tar xvzf latest.tar.gz && /bin/rm latest.tar.gz'
#     - cwd: /var/www/html/
#     - unless: test -d /var/www/html/wordpress
#     - require:
#       - pkg: httpd-packages
#     - require_in:
#       - file: /var/www/html/wordpress/wp-config.php

# wordpress-keys-file:
#   cmd.run:
#     - name: /usr/bin/curl -s -o /var/www/html/wordpress/wp-keys.php https://api.wordpress.org/secret-key/1.1/salt/ && /bin/sed -i "1i\\<?php" /var/www/html/wordpress/wp-keys.php && chown -R apache:apache /var/www/html/wordpress
#     - unless: test -e /var/www/html/wordpress/wp-keys.php
#     - require_in:
#       - file: /var/www/html/wordpress/wp-config.php

# wordpress-config:
#   file.managed:
#     - name: /var/www/html/wordpress/wp-config.php
#     - source: salt://mysql/files/wp-config.php
#     - mode: 0644
#     - user: apache
#     - group: apache
#     - template: jinja
#     - context:
#       username: {{ salt['pillar.get']('wordpress:wp-username', 'wpuser') }}
#       database: {{ salt['pillar.get']('wordpress:wp-database', 'wpdb') }}
#       password: {{ salt['pillar.get']('wordpress:wp-passwords', 'wppass') }}
#     - require:
#       - cmd: get-wordpress