# install
- install composer 2. find or serach how to install composer for laravel in youtube
```
composer install
```
- install npm
```
npm install
```
- build npm
```
npm run dev
```
if for production use
```
npm run production
```

# install and setup laravel
- setup .env
- pastikan database mysql or postgre dibuat dan isi database pada .env
- setup migration for fresh install database
```
php artisan migrate:fresh --seed
```
pastikan ini instalasi awal untuk mengisi database. jika perintah ini digunakan maka otomatis jika ada database yang pernah ada akan di hapus dan diulang dengan database baru

# set git Jika menggunakan ssh
- if cant push then add agent with ssh
```
ssh-add ~/.ssh/id_rsa_dell
```
if working, then type password  *******83
cek ssh agen if not running
```
ps aux | grep ssh-agent
```
If blank Start the SSH Agent (if it's not running)
```
eval "$(ssh-agent -s)"
```
then make sure name instead:
```
ssh-add -l
```

- cek if connection to gitlab
```
ssh -T git@gitlab.com
```

- cek remote
```
git remote -v
```
if no remote then add 
```
git remote set-url origin https://github.com/idkraf/gentulbar.git
```
