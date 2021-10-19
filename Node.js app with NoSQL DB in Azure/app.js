const CosmosClient = require("@azure/cosmos").CosmosClient;
const config = require("./config");
const dbContext = require("./data/databaseContext");

//  <DefineNewItem>
const newItem = {
    id: "4",
    director: "Tim Miller",
    leadactor: "Ryan Reynolds",
    moviename: "Deadpool",
    year: "2016"
  };
 
  
  async function main() {
    
    // <CreateClientObjectDatabaseContainer>
    const { endpoint, key, databaseId, containerId } = config;
  
    const client = new CosmosClient({ endpoint, key });
  
    const database = client.database(databaseId);
    const container = database.container(containerId);
  
    // Checking if MoviesCtalog database is already setup. If not, creating it.
    await dbContext.create(client, databaseId, containerId);
    
    try {
         // <QueryItems>
        console.log(`Querying container: Movies\n`);
  
        // query to return all items
        const querySpec = {
        query: "SELECT * from c"
        };
      
        // read all items in the Movies container

        const { resources: items } = await container.items
            .query(querySpec)
            .fetchAll();
  
          items.forEach(item => {
            console.log(`${item.id} - ${item.director} - ${item.leadactor} - ${item.moviename} - ${item.year}`);
        });
      
        // <CreateItem>

         const { resource: createdItem } = await container.items.create(newItem);
      
        console.log(`\r\nCreated new item: ${createdItem.id} - ${createdItem.director} - ${createdItem.leadactor} - ${createdItem.moviename} - ${createdItem.year}\r\n`);
      
         // <DeleteItem> 

        var id ="4";
        var moviename= "Deadpool";
        const { resource: result } = await container.item(id,moviename).delete();
        console.log(`Deleted item with id: ${id}\n`); 
      
    } catch (err) {
      console.log(err.message);
    }
  }
  
  main();
