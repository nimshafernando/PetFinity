describe('Lost and Found Map Test Suite', () => {

    it('should log in, navigate to the Lost and Found Map page, and interact with the map buttons', () => {
      // Log in
      cy.visit('/login');
      cy.get('input[name="email"]').type('owner@gmail.com'); // Adjust the email as necessary
      cy.get('input[name="password"]').type('hotwheels5'); // Adjust the password as necessary
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/dashboard');
  
      // Navigate to the Lost and Found Map page
      cy.get('.lost-found-card .btn').contains('View Map').click();
      cy.url().should('include', '/missing-pets/map');
  
      // Verify the map is visible
      cy.get('#map').should('be.visible');
  
      // Test "Show All" button
      cy.get('#showAll').click();
      cy.get('#showAll').should('have.class', 'active'); // Verify the button is active
      // Check if markers are present on the map (for Leaflet or Google Maps, you might check for markers or custom elements)
      cy.get('.gm-style img[src*="https://maps.google.com/mapfiles/"]').should('exist');
  
      // Test "Show Missing Pets" button
      cy.get('#showMissing').click();
      cy.get('#showMissing').should('have.class', 'active'); // Verify the button is active
  
      // Test "Show Sightings" button
      cy.get('#showSightings').click();
      cy.get('#showSightings').should('have.class', 'active'); // Verify the button is active
  
      // Test "Show Pets Near Me" button
      cy.get('#showPetsNearMe').click();
      cy.get('#showPetsNearMe').should('have.class', 'active'); // Verify the button is active
      // If geolocation is supported, you might want to check for a specific marker or user location marker
  
      // Optionally, verify markers (depending on your map implementation)
      cy.get('.gm-style img[src*="https://maps.google.com/mapfiles/ms/icons/blue-dot.png"]').should('exist');
    });
  
  });
  