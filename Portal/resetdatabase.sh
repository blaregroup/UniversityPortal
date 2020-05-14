clear
echo "	[+] =========================================== [+]"
echo "	|         Project : University Portal             |"
echo "	|                   BlareGroup                    |"
echo "	|               By: Surajsinghbisht054            |"
echo "	[+] =========================================== [+]"
echo "	"
echo "	Description :"
echo "	     This Script Will Reset Everything"
echo "	     And Insert Demo Data Into Database"
echo "	"
echo "	"
echo "	Progress Bar [==               ]"
echo "	"
sleep 4
composer dump-autoload
echo "	"
echo "	Progress Bar [====             ]"
echo "	"
php artisan migrate:fresh
echo "	"
echo "	Progress Bar [======           ]"
echo "	"
echo "	 Hang Tight.. Here It Can Take nearly 1-5 minutes......."
php artisan db:seed
echo "	"
echo "	Progress Bar [==============   ]"
echo "	"
more addAdmin.cmd | php artisan tinker
echo "	"
echo "	Progress Bar [================  ]"
echo "	"
#php artisan tinker
rm public/storage
echo "	"
echo "	Progress Bar [================= ]"
echo "	"
php artisan storage:link
echo "	"
echo "	Progress Bar [==================]"
echo "	"
php artisan serve

