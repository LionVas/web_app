Не стал заморачиваться, кинул все сразу сюда
Докер билдим так:sudo docker build -t web_app:v1 .                                                
Запускаем так: sudo docker run -d --name web_app -p 8080:80 -v web_app:/var/lib/mysql web_app:v1
