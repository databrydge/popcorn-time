### Welcome to the Databrydge Exercise: 
# :popcorn: Popcorn Time :popcorn:

### Quick introduction
> TL;DR follow the setup [here](setup.md) to set up the application, read the main goal (below) and submit the exercise on a forked, public repo through an open pull request, to which you assign our accounts ([rafaello104](https://github.com/rafaello104) & [barra66](https://github.com/barra66)) as reviewers.

This exercise is called, `popcorn time`, and is a simple but fun demo web-app that holds movies & reviews for those movies. Starting off with dummy data (see running the `Fixtures` in the [setup readme](setup.md#setting-up-the-database--the-docker-service--on-linux--mac-os-)) allows you to see what the app should look like.

However, rather than filling in movies & reviews manually like a plebeian, we are going to make this app have :superhero: superpowers :superhero_woman: by reading in two `.csv` files, each containing a metric buttload of data! :zap: (ex.: >110.000 reviews). 


## Assignment rules for submission (**READ FIRST**)
When it comes to the coding / solving the assignment's goals, there are no rules. Use whatever you want, from composer packages, to plugins JS,etc... all of it is allowed! <br/>
The only rules there are, are about how to submit your final code as part of the assignment, you can read below what is expected.

- Make sure you forked our repository to a repository on your own github account <br/>
- Do not work on the default (`master`) branch, rather use a new branch to code everything on
- Bonus points for whoever has regular commits instead of one big push :sweat_smile:
- When finished with coding and all your changes have been pushed to your branch, make a PR...
- Make sure to write a clear PR title & description explaining exactly what you did since the goals in this exercise are optional.
- Do not merge the pull request, rather simply share the pull request and assign us as reviewer.
- (make sure the repository is either public or our accounts have been invited as collaborators otherwise we will not be able to see the code.)
- The github accounts are the following: [rafaello104](https://github.com/rafaello104) & [barra66](https://github.com/barra66)


## Set up everything for the exercise:
> See the full explanation on how to set up [here](setup.md).


## Main (& mandatory) goal
In the `public\import` directory, you will find two files:
- `movies.csv`, holds a large list of movies taken from [rotten tomatoes](https://www.rottentomatoes.com/)
- `critic_reviews.zip`, holds a large list of reviews on those movies, also taken from [rotten tomatoes](https://www.rottentomatoes.com/) <br/>
*(unzip this one to reveal `critic_reviews.csv`, was too big for github, don't worry the too large .csv file has been added to the .gitignore so the file will be ignored when you are pushing.)*

The main goal here is to make it possible, with the click of a button, to make the following happen:
- Extract all the movies from the `movies.csv` file & save them all in the database
- Extract all the reviews from the `critic_reviews.csv` file, link them to the movies from the previous step & save them in the database.

If your code worked correctly, you should see all the movies in the web app. Of course there will be only default images since the data does not contian links to images. (This is a fun optional challenge for those interested).


## Optional goals
Below are some optional goals, not doing these does not give a negative impact on your chances at Databrydge. We have enough code off of the main goal to rate your skills. But, for those of you that are having fun with the exercise, here is some extra fun to be had! :wink:

### Metadata
Those movies in the web app UI look really weird with those default images, don't they? You see that button in the navbar, called `Refresh metadata!`? Do you see where I am going with this.....?

Let's make use of some of your API skills and make a function that, on the click of that button, will go over all the movies in the database and simply add some of the metadata. In this case, we want to add pictures, pictures galore! Each movie entity can hold a `bannerImage` and a `profileImage`. The bannerImage is the wide one used in the hero of the details page & the hover effect on the home page, whereas the profile Image is used in the rectangle and bubble display.  

Let's use themoviedb.org, they have a beautiful API that allows us to get all that data. You can find their excellent api documentation over [here](https://developers.themoviedb.org/3/getting-started/introduction). I already set up the API_KEY in the `.env` file for you so you don't need to waste time making an account.


### Find movies easily
With our ~18.000 movies in the databse, that "all movies" page is getting a bit ridiculously slow to load, no? Nevermind the finding of a movie & opening its details page..

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