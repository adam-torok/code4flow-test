# Kezo koltok klubbja

## Setting up the project:

1. make a new .env file, than copy the .env.example into that file
2. add your mailtrap user to .env --- IMPORTANT for admin crud
3. run command: 'composer install'
4. run command: 'php artisan key:generate' 
5. run command: 'npm install'
6. run command: 'npm run dev' / 'npm watch dev'
7. run command: 'php artisan migrate'
8. run command: 'php artisan db:seed' --- seeds admin, some users, poems REPORTS NOT INCLUDED
9. run command: 'php artisan serve'

# Features

    _Brief list of features_

## ADMIN

- Go to route admin/login.
- Credentials: admin@admin.hu / admin123

### USERS:
- List users - filtering etc are done via datatables for simplicity
- Show user - check user data, active or deactivate the given user (deactivated users cannot submit poems)
- Edit user - edit user datas
- Delete user - delete user data (uses soft deletes) 

### POEMS:
- List poems -  filtering etc are done via datatables for simplicity
- Edit poems - edit poem title, category, body, and switch statuses for poems (approved, waiting or declined)
        If the status of the poem is changed, the user will be notified via notification on the user notification page, and via email
- Delete poem - deletes a poem

###  REPORTS:
- Reports are user submitted forms, which explains a bug, or a desired feature  - did not write seeder for it
- List reports - filtering, etc. are done via datatables for simplicity
- Edit reports - edit report title, body, and switch statuses (resolved, waiting or declined) 
                    and also to respond to the user with a short message like 'we are working on it! thank you'. If you write a respond, the user will get notified
                    via email and notification
- Delete report - deletes a report

## USERS

### PROFILE
- Create a user
- Extend informations about you
- View other's profile
- Check other's poems
- Delete your profile

### POEMS:
- List poems -  list your submitted poems, check statuses
- Edit poems - edit poem title, category, body
        If the status of the poem is approved / declined, the user will be not able to edit it anymore
- Delete poem - deletes a poem

###  REPORTS:
- Reports are user submitted forms, which explains a bug, or a desired feature
- List reports - filtering, etc. are done via datatables for simplicity
- Edit reports - edit report title, body, and switch statuses (resolved, waiting or declined) 
                    and also to respond to the user with a short message like 'we are working on it! thank you'. If you write a respond, the user will get notified
                    via email and notification
- Delete report - deletes a report


