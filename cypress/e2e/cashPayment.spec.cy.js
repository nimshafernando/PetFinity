describe('Cash Payment Flow', () => {
    beforeEach(() => {
        cy.visit('/login');
        cy.get('input[name="email"]').type('emily@gmail.com');
        cy.get('input[name="password"]').type('aaqilah123');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard');
    });

    it('should navigate to payment selection page and complete the cash payment flow', () => {
        cy.visit('/test');

        cy.get('#cash-option').click();
        cy.get('#cash-payment-button').should('be.visible').and('not.be.disabled').click();

        cy.url().should('include', '/cash/payment');

        cy.get('.details-section')
          .should('contain', 'Appointment Details')
          .and('contain', 'Pet Name:')
          .and('contain', 'Total Price: LKR');

        cy.get('.back-button').should('be.visible').click();
        cy.url().should('include', '/dashboard');
    });
});


