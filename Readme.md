# 注意事項一覧
## このプロジェクトを起動させた時<br>
・webサーバが動かない<br>
　→dockerのwordpressコンテナに入る<br>
　→以下のコマンドを上から順に実行<br>
\```
　a2dismod php7
\```

<br>

\```
　a2enmod php7
\```

<br>

\```
　service apache2 restart
\```

<br>

\```
　apache2 -D FOREGROUND
\```