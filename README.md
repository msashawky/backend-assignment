Reachnetwork Backend Web Development Assignment 
===========================
Start by forking this repo, solving the descriped below problem and pass the tests.

Send the URL of the new repo to Sameh@reachnetwork.co when you're finished.


## Description
Write a simple program that has implementations for user analytics service that record a new visit/view for each api call.
create 2 APIs for view all users and getting user details.
* /api/v1/users         getting 15 users per page ordered by user weekly visits and record new view for each user.
* /api/v1/users/{id}    getting user by id and record new visit for this user.

#### Feature Test
* make sure to that your code pass tests in UserTest.php

#### Performance test
* seed the database tables with 50K users and 1M views and benchmark the 2 APIs average response time.
