# set git
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
git remote set-url origin git@gitlab.com:dpt-tps/quickcount-metronic.git
```
