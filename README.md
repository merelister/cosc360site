# cosc360site

TODO: Update README to remove laraval information and instead specify instructions for xampp

## Creating Pull Requests
Create a pull request whenever you want to add changes from a branch to the main branch.

Steps using command line Git:
1. Switch to main branch and pull any recent changes.
```
git checkout main
git pull
```
2. Switch back to your working branch and merge the changes from main into your branch.
```
git checkout branchname
git merge main
```
3. Use your IDE to fix any merge conflicts. Commit and push the branch again after conflicts are fixed.
4. On github, open a pull request for your branch. Link any issues that are fixed by your branch.
5. When everyone has a chance to review the PR, we can merge it into the main branch.

# Running Site
While in the `backend` directory, run 
```
npm install
```
(I haven't checked whether the above step is actually necessary, I just assumed so based on the presence of the `package.json` file)

## [Installing composer for laravel](https://monovm.com/blog/how-to-install-laravel-on-local-host-xampp/)

If you already have xampp and php installed, then you can [install Composer from here.](https://getcomposer.org/)

Check that Composer is installed by running it in your command prompt:
```
composer
```

You'll need to move your project folder to `xampp\htdocs` to run it.

Navigate to the backend directory within your project folder and run
```
composer install
```
This installs the project dependencies that are specified in `composer.json`. If successful, you should see a `vendor` directory within the project directory.

---

Now (still within the backend directory), run

```
php artisan serve
```
in order to start the server.

You can open up your browser to `http://127.0.0.1:8000/360_site.html` to check if it worked.

Note: `backend/server.php` takes in a url, and then tries to run that file in the `public` directory. So when you visit the url above, you're actually opening up the file at `projectFolder/backend/public/360_site.html`.

This means that all our frontend files need to be in the `public` directory.

## Migrating the database(s)

Make sure the database setting are correct in the .env file. Then, in the backend directory run the command

```
php artisan migrate
```
