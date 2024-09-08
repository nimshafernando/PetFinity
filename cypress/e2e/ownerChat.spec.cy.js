describe('Pet Owner Access Chat from Dashboard', () => {
    it('should log in as a pet owner, navigate to the dashboard, click the chat button, select The Wagging Tail Inn, send a message, refresh the page, and verify the message', () => {
        cy.visit('/login');
        cy.get('input[name="email"]').type('emily@gmail.com');
        cy.get('input[name="password"]').type('aaqilah123');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard');

        cy.get('.services-box a').contains('Start a Conversation').click();
        cy.url().should('include', '/petowner/chats');

        cy.get('.chat-sidebar').should('be.visible');
        cy.get('.chat-sidebar a').contains('The Wagging Tail Inn').click();

        const messageText = 'Hello The Wagging Tail Inn! How is my pet doing?';
        cy.get('input[name="message"]').type(messageText);
        cy.get('button[type="submit"]').click();

        cy.get('#chatBox .message.sent').should('contain', messageText);

        cy.reload();

        cy.get('.chat-sidebar a').contains('The Wagging Tail Inn').click();
        cy.get('#chatBox .message.sent').should('contain', messageText);
    });
});


