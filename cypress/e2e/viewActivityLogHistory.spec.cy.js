describe('Activity Log History Test Suite', () => {

  it('should log in, click on View Activity Log History, and verify the activity log page', () => {
      cy.visit('/login');
      cy.get('input[name="email"]').type('emily@gmail.com');
      cy.get('input[name="password"]').type('aaqilah123');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/dashboard');

      cy.get('button').contains('View Activity Log History').click();
      cy.url().should('include', '/appointment-history');

      cy.get('h2').contains('Activity Log History').should('be.visible');

      cy.get('.back-button').click();
      cy.url().should('include', '/dashboard');
  });

});

