const { defineConfig } = require("cypress");

module.exports = defineConfig({
  reporter: 'cypress-mochawesome-reporter',
  reporterOptions: {
    charts: true,
    reportPageTitle: "PetFinity-cc01",
    embededScreenshots: true,
    inlineAssets: true,
    saveAllAttempts: false,
  },
  e2e: {  
    setupNodeEvents(on, config) {
      // implement node event listeners here
      require('cypress-mochawesome-reporter/plugin')(on);
    },
    baseUrl : 'http://127.0.0.1:8000/',
    //we have to test multiple tests together 
    testIsolation : false
  },
  "watchForFileChanges" : false,
  "defaultCommandTimeout" : 100000,
  "pageLoadTimeout" : 100000,
  "chromeWebSecurity" : false,

  "viewportHeight" : 1080,
  "viewportWidth" : 1920,
});