class LoginPage {
    visit() {
      cy.visit('/login');
    }
  
    fillEmail(value) {
      const field = cy.get('input[name="email"]');
      field.clear();
      field.type(value);
      return this;
    }
  
    fillPassword(value) {
      const field = cy.get('input[name="password"]');
      field.clear();
      field.type(value);
      return this;
    }
  
    submit() {
      const button = cy.get('button[type="submit"]');
      button.click();
    }
  }
  
  export default LoginPage;
  