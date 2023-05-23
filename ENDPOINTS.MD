API Endpoint: /api <br>
This API endpoint provides various actions related to user management and session handling. It accepts requests in JSON format and responds with JSON data.<br>
<br>
Endpoint Details<br>
Method: POST<br>
URL: /api<br>
Request Parameters<br>
The API endpoint expects the following parameters in the request:<br>
<br>
token (required): The authentication token for the shop.<br>
action (required): The action to be performed. Possible values: listGames, getBalance, changeBalance, createSession, closeSession.<br>
Additional parameters depending on the action.<br>
Response Format<br>
The API endpoint responds with JSON data containing the following fields:<br>
<br>
status: The HTTP status code indicating the status of the request.<br>
msg: A message providing additional information about the request or any errors.<br>
Additional data depending on the action.<br>
Actions<br>
Action: listGames<br>
This action retrieves a list of games based on the provided filters.<br>
<br>
Request Parameters<br>
id: Filter games by ID.<br>
name: Filter games by name (multiple names can be provided using the pipe symbol |).<br>
search: Filter games by title.<br>
device: Filter games by device (multiple devices can be provided using the pipe symbol |).<br>
view: Filter games by view.<br>
labels: Filter games by labels (multiple labels can be provided using the pipe symbol |).<br>
category: Filter games by category (multiple categories can be provided using the pipe symbol |).<br>
subcat: Filter games by subcategory (new or hot).<br>
Response<br>
The response will contain a JSON array of games matching the provided filters.<br>
<br>
Action: getBalance<br>
This action retrieves the balance of a user.<br>

Request Parameters<br>
identifier: The username of the user.<br>
Response<br>
status: 200 if successful, 400 if user not found.<br>
balance: The balance of the user.<br>
Action: changeBalance<br>
This action changes the balance of a user.<br>
<br>
Request Parameters<br>
identifier: The username of the user.<br>
amount: The new balance amount.<br>
Response<br>
status: 200 if successful, 400 if user not found or an error occurred.<br>
Action: createSession<br>
This action creates a session for a user.<br>
<br>
Request Parameters<br>
identifier: The username of the user.<br>
Response<br>
token: The session token.<br>
Action: closeSession<br>
This action closes all sessions for a user.<br>
<br>
Request Parameters<br>
identifier: The username of the user.<br>
Response<br>
status: 200 if successful, 400 if user not found or an error occurred.<br>
