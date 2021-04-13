# cosc360site

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
1. Start up xampp and run the apache server and the mysql server
2. Open phpMyAdmin (localhost/phpMyAdmin) from your lamp default homepage (localhost). Create a new database called '360site' using the default settings.
3. Select the database you just created from the left-hand side explorer. This will allow you to interact with the database. You can now import the structure of the database to use for this lab. Select the Import operation (from the top menu bar) (Figure 2) and then select the file 360site.sql from the lab starter files. Select ‘Go’ (located at bottom of page). This will load data into the database.
4. Open your web browser, navigate to http://localhost/cosc360site/public/.
