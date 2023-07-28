# API Documentation

This documentation provides an overview of the API for handling operator-related actions. The API is designed to perform various tasks related to game operators and their functionalities. Please follow the guidelines below to understand the available endpoints and their functionalities.

## Base URL

The base URL for accessing the API is:

```
https://api-prod.mortalsoft.online
```

## API Endpoint

The API endpoint for accessing operator-related actions is:

```
GET /api/{token}/{action}
```

### Parameters

- `{token}` (string) - The authentication token to access the API.
- `{action}` (string) - The action to be performed by the API.

## Authentication

To access the API, you need to provide a valid authentication token in the URL. Without a valid token, the API requests will be rejected.

## Actions and Responses

The API supports the following actions, each corresponding to a specific operator-related task:

### 1. List Games

**Action:** `listGames`

**Description:** This action allows you to list games associated with a specific shop.

#### Request Parameters

- `id` (optional) - Filter games by ID.
- `name` (optional) - Filter games by name. You can provide multiple names separated by `|`.
- `search` (optional) - Filter games by title using a search term.
- `view` (optional) - Filter games by a specific view.
- `labels` (optional) - Filter games by labels. You can provide multiple labels separated by `|`.
- `category` (optional) - Filter games by category. You can provide multiple categories separated by `|`.
- `subcat` (optional) - Filter games by subcategories, such as "new" or "hot".

#### Response

The response will be a JSON array containing a list of games matching the provided filters.

### 2. Get Balance

**Action:** `getBalance`

**Description:** This action allows you to retrieve the balance of a user identified by their `identifier`.

#### Request Parameters

- `identifier` - The unique identifier of the user.

#### Response

The response will be a JSON object containing the user's balance.

### 3. Change Balance

**Action:** `changeBalance`

**Description:** This action allows you to update the balance of a user identified by their `identifier`.

#### Request Parameters

- `identifier` - The unique identifier of the user.
- `amount` - The new balance amount.

#### Response

The response will be a JSON object indicating whether the balance update was successful or not.

### 4. Create Session

**Action:** `createSession`

**Description:** This action allows you to create a session for a user identified by their `identifier`.

#### Request Parameters

- `identifier` - The unique identifier of the user.

#### Response

The response will be a JSON object containing a JWT token representing the user's session.

### 5. Game play

**URL:** `https://api-prod.mortalsoft.online/play/{game}/{usertoken}`

**Description:** This will allow you to embed game in iframe

#### Request Parameters

- `game` - game name.
- `usertoken` - After you started session you will receive this temp token.

#### Response

If the session is successfully started, the user will be able to play game URL.

## Error Codes

The API may return various HTTP status codes to indicate the success or failure of a request. Here are the common error codes:

- `400` - Bad Request. Occurs when required parameters are missing or invalid.
- `401` - Unauthorized. Occurs when the authentication token is missing or invalid.
- `403` - Forbidden. Occurs when the user does not have permission to perform the requested action.
- `404` - Not Found. Occurs when the requested resource or action is not found.
- `500` - Internal Server Error. Occurs when an unexpected server error occurs.

---
