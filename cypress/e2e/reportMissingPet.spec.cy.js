describe('Report Missing Pet Test Suite', () => {

  it('should log in, navigate to Report Missing Pet, fill out the form, submit, and verify on map', () => {
      const petName = 'Rhoda Mathews';

      cy.visit('/login');
      cy.get('input[name="email"]').type('emily@gmail.com');
      cy.get('input[name="password"]').type('aaqilah123');
      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/dashboard');

      cy.visit('/missing-pets/create');
      cy.url().should('include', '/missing-pets/create');

      cy.get('select[name="pet_id"]').select(petName);
      cy.get('input[name="last_seen_location"]').type('no 66 daham mawatha, moratuwa');
      cy.get('input[name="last_seen_date"]').type('2024-08-18');
      cy.get('input[name="last_seen_time"]').type('14:30');
      cy.get('textarea[name="distinguishing_features"]').type('White fur with black spots, wearing a red collar');

      const filePath = 'images/dog.jpg';
      cy.get('input[name="photo"]').attachFile(filePath);

      cy.get('button[type="submit"]').click();
      cy.url().should('include', '/missing-pets');
  });

});

