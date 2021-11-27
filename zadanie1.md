Zadanie 3. <br />
a. zbudowanie opracowanego obrazu kontenera <br />
	docker build -t obraz_zadanie1 . <br /><br />
b. uruchomienia kontenera na podstawie zbudowanego obrazu <br />
	docker run -d -p 80:80 --name zadanie1 obraz_zadanie1 <br /><br />
c. sposobu uzyskania informacji, które wygenerował serwer w trakcie uruchamiana kontenera <br />
	docker exec -it zadanie1 bash <br />
Wywolujemy skrypt i szukamy logow w /var/www/html/
	cat log_20.11.2021.log
d. sprawdzenia, ile warstw posiada zbudowany obraz <br />
	docker image inspect projectphp | jq ".[] .RootFS" <br /><br />
