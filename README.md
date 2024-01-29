
## MY_BLOG

Мой первый пэт проект, ехали..

- в **_.env_** указываем `DB_CONNECTION=sqlite`
- в папке **_database_** создаем **database.sqlite**
- > php artisan migrate:fresh --seed
- > php artisan storage:link
- Для отображенния изображений расположенных _public/storage_,  во _views/admin/posts/edit.blade_ нужно раскомментировать `/*asset('storage/'.*/ $post->preview_image /*)*/` в тегах `<img>` на 68 и 87 строке



