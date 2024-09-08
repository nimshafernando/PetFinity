describe('Pet Boarder Reviews Test Suite', () => {

    it('should log in, navigate to the pet boarding center dashboard, click View Reviews, and verify the reviews are displayed', () => {
        cy.visit('/login');
        cy.get('input[name="email"]').type('boarder3@gmail.com');
        cy.get('input[name="password"]').type('aaqilah123');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard');

        cy.visit('/boarding-center/reviews');
        cy.url().should('include', '/boarding-center/reviews');

        cy.get('h3').contains('Reviews').should('be.visible');
        cy.get('p').contains('See what pet owners have to say about your services.').should('be.visible');

        cy.get('.review-item').should('have.length.at.least', 1);

        cy.get('.review-item').each(($review) => {
            cy.wrap($review).find('.review-rating').contains('Stars').should('be.visible');
            cy.wrap($review).find('.review-text').should('not.be.empty');
            cy.wrap($review).find('.review-meta').should('contain', 'Reviewed by');
        });
    });

});

