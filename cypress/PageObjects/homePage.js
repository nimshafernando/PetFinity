class HomePage {
    visit() {
      cy.visit('/');
    }
  
    getTitle() {
      return cy.get('.title');
    }
  }
  
  export default HomePage;
  