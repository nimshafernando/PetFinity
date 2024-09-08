describe('Card Payment', () => {
    beforeEach(() => {

        cy.visit('/login');
        cy.get('input[name="email"]').type('emily@gmail.com');
        cy.get('input[name="password"]').type('aaqilah123');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); 

    it('should allow the pet owner to select card payment and attempt to complete the payment', () => {
       
        cy.visit('/test');

        cy.get('.payment-option').contains('Pay with Card').click();
        cy.get('button#stripe-payment-button')
          .should('be.visible') 
          .and('not.be.disabled'); 
        cy.get('button#stripe-payment-button').click();

        cy.log('Payment flow completed up to card payment initiation.');
       
    });
});
});



