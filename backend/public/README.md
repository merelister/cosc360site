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
