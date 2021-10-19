const config = {
    endpoint: "https://moviesaccount.documents.azure.com:443/",
    key: "uO4eGBY4ZKqyN1GKsbqmJbCdvo10FmVcSSIcM9mvB0LQOnATEdLtAzpRTbTLXKDW8QIWZdOgFBwUgZGyPeJIZg==",
    databaseId: "MoviesCatalog",
    containerId: "Movies",
    partitionKey: { kind: "Hash", paths: ["/moviename"] }
  };
  
  module.exports = config;