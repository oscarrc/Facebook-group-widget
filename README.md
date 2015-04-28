# Facebook-group-widget
A widget to display Facebook Group wall into a web page

Get an access token from https://developers.facebook.com/tools/explorer
 
Long lived Access Token:

1. On the top right, select the FB App you created from the "Application" drop down list.

2. Click "Get Access Token".

3. Make sure you add the manage_pages permission.

4. Convert this short-lived access token into a long-lived one by making this Graph API call:
https://graph.facebook.com/oauth/access_token?client_id={your FB App ID}&client_secret={your FB App secret}&grant_type=fb_exchange_token&fb_exchange_token={your short-lived access token}

5. Grab the new long-lived access token returned back.

Grab the access_token for the page you'll be pulling info from.
