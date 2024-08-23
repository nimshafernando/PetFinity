describe('Lost and Found Map Test Suite', () => {

  it('should log in and verify that the Lost and Found Map page loads with the map visible', () => {
    // Log in
    cy.visit('/login');
    cy.get('input[name="email"]').type('owner@gmail.com'); 
    cy.get('input[name="password"]').type('hotwheels5'); 
    cy.get('button[type="submit"]').click();
    cy.url().should('include', '/dashboard');

    // Navigate to the Lost and Found Map page
    cy.get('.lost-found-card .btn').contains('View Map').click();
    cy.url().should('include', '/missing-pets/map');

    // Verify the map is visible
    cy.get('#map').should('be.visible');
  });

});


