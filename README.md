# Popcorn Time :popcorn:
> TL;DR follow the setup [here](setup.md) to set up the application, submit the exercise on a private repo through an open pull request (**please do not fork this repo**), to which you assign our account ([barra66](https://github.com/barra66)) as reviewers. Of course, make sure to invite us to the repository so we can see it.

## Quick introduction

This exercise is called, `popcorn time`, and is a simple but fun demo web-app that holds movies & reviews for those movies. Upon installing the app you can immediately seed dummy data (as mentioned in the [setup](setup.md#setting-up-the-database--the-docker-service-on-linux--mac-os)) to the database allowing you to see what the app should look like!

However, rather than filling in movies & reviews manually like a plebeian, we are going to make this app have :superhero: superpowers :superhero_woman: by reading in two **.csv** files, each containing a metric buttload of data! :zap: (ex.: >110.000 reviews). 

## Set up everything for the exercise:
> See the full explanation on how to set up the environment [here](setup.md).


## Assignment rules for submission
When it comes to coding / solving the assignment's tasks, there are no rules. Use whatever you want, from composer packages, to plugins JS, etc... all of it is allowed! <br/>
The only rules there are, are about how to submit your final code as part of the assignment, you can read below what is expected.

- Follow the steps [here](setup.md#get-git-set-up--the-project-files-on-your-pc) to get your own repository set up correctly.
- Do **not** fork our repository
- Once your version of the repository is pushed, make sure you have all the history & commits of our repository intact.
- Make sure your repository is private and we are invited as collaborators: [barra66](https://github.com/barra66)
- Do not work on the default `master` branch, rather use a new branch to code everything on
- Bonus points for whoever has regular commits instead of one big push :sweat_smile:
- When finished with coding and all your changes have been pushed to your branch, make a PR...
- Make sure to write a clear PR title & description explaining exactly what you did since some of the tasks in this exercise are optional.
- Do not merge the pull request, rather simply share the pull request and assign us as reviewers.

## Task 1 - Load data from CSV files
In the `public\import` directory, you will find two files, the goal is to extract all that juicy data from those files with a click of a button:
- Extract all the movies from the **movies.csv** file & save them all in the database
- Extract all the reviews from the **critic_reviews.csv** file, link them to the movies from the previous step & save them in the database.
- The navbar holds a section `Read from file`, use the buttons below this section to trigger the reading of the respective .csv files 

If your code worked correctly, you should see all the movies in the web app (only the latest on the homepage). Of course, there will be only default images since the data does not contain any links to images of the movies. (This is a fun challenge in Task 2).

> To see an explanation of the exact data held in the two .csv files, you can go to [this](public/import/README.md) readme.


## Task 2 - Load Metadata from API
Those movies in the web app UI look really weird with those default images, don't they? You see that button in the navbar, called `Refresh metadata!`? Do you see where I am going with this.....?

Let's make use of some of your API skills and make a function that, on the click of that button, will go over all the movies in the database and simply add some of the metadata. In this case, we want to add pictures, pictures galore! Each movie entity can hold a `bannerImage` and a `profileImage`. The bannerImage is the wide one used in the hero of the details page & the hover effect on the home page, whereas the profile Image is used in the rectangle and bubble display.  

Let's use themoviedb.org, they have a beautiful API that allows us to get all that data. You can find their excellent API documentation over [here](https://developers.themoviedb.org/3/getting-started/introduction). Please check the documentation for information on how to communicate with the API, how to authenticate, and the necessary API endpoints to download the profile and banner images of the movies.

For this task, the goal is to enhance the web app UI by integrating movie images using The Movie Database (TMDB) API. Specifically, when a user clicks the 'Refresh metadata!' button, the application should fetch images from the TMDB API so that the new images replace the default images of each movie in the database.

---

## Optional tasks
Below are some optional tasks, not doing these, does not give a negative impact on your chances at Databrydge. We have enough code off of the main tasks to rate your skills. But, for those of you who are having fun with the exercise, here is some extra fun to be had! Also, since these tasks are optional, altering them or doing different/additional changes to the project are all valid of course. :wink:

### Task 3 - Find movies easily
With our ~18.000 movies in the database, that "all movies" page is getting a bit ridiculously slow to load, no? Nevermind the finding of a movie & opening its details page..

#### Modern style solution?
- Add a search bar in the navigation bar, feel free to remove the all movies link, that one is useless now :sweat_smile:
- When typing in the search bar, make 3 or so results popup as you are typing. 
- Allowing the user to click or navigate with the arrow keys to one of the supplied results and go directly to the details page


#### Old school solution?
- Add a search bar to the navigation bar, without live results
- When pressing enter after typing your query, load a new page with the results in a list view
- Optionally paginate the results if there are more than X (as to not make the page load too slow)
- Pagination can be done through ajax or url parameters, whichever suits your style

#### Ultimate solution?
- Do both of the above :wink:
