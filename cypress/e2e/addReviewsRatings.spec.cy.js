describe('Leave a Review from Booking History Test Suite', () => {

  it('should log in, navigate to Booking History, click Leave a Review for a past appointment, fill out the review form, and submit', () => {
      const rating = '5';
      const reviewText = 'Excellent service and care for my pet!';

      cy.visit('/login');
      cy.get('input[name="email"]').type('emily@gmail.com');
      cy.get('input[name="password"]').type('aaqilah123');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/dashboard');

      cy.visit('/history');
      cy.url().should('include', '/history');

      cy.get('.review-button a').contains('Leave a Review').click();
      cy.url().should('include', '/reviews/create');

      cy.get('select[name="rating"]').select(rating);
      cy.get('textarea[name="review"]').type(reviewText);

      cy.get('button[type="submit"]').click();

      cy.url().should('include', '/history');
   });

});




