When initializing a new project follow these steps to push the local theme to github:

git init
git status
git add .
git commit -m "first commit"
git branch -M main
git remote add origin "urloftheprojectbutwithoutquotes".git
git push -u origin main

If the repo already has code either pull or clone it, never push code without pulling the code first!
