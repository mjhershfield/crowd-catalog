# crowd-catalog
## Goal: Make a Waze-like application so that people could report coronavirus safety information for businesses.
### If you want to see this repo in action, visit <https://crowdcatalog.atwebpages.com/>
_Have you ever wanted to know how safe it will be to go to the grocery store?_
- Are people wearing masks?
- How clean is it?
- Is social distancing being followed?
We wanted to make a system where people could choose a place, write a review about how safe it is, and view other people's reviews.

We wanted to implement this using the Google Maps Places and Javascript APIs so that it would be be cross-platform without worries. Unfortunately, we switched over to this project halfway through Saturday and did not have enough time to implement reading reviews. But, if you would like, you can still search up a location (assuming you give the site location access) and the site will select the closest place that matches your query. You have to click the arrow button in the search box to send the search. Once a location has been selected, you can write a review for it using the message button in the bottom left. All submitted reviews are held in a MySQL database, but we have not yet implemented a way to access other people's reviews.

If we were to continue this project, we would:
- Use the proper client side Places API. (We accidentally used the server side API but it was too late to change once we realized)
  - This would allow us to not have to use the sketchy CORS workaround 
- Implement Viewing Others' reviews
- Allow searching for locations near the user and allow the user to select which place near them they would like to review/view reviews for
- Make a basic account system so reviews are not anonymous
- Improve database security
- Make the site look prettier in general