<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Chat Template</title>
    <link rel="stylesheet" href="style2.css">
    <!-- FontAwesome for UI Icons -->
    <link rel="stylesheet" href="https://cloudflare.com">
</head>
<body>

    <div class="app-container">
        
        <!-- SIDEBAR: Contacts List -->
        <aside class="sidebar">
            <div class="user-profile">
                <img src="https://pravatar.cc" alt="My Avatar" class="avatar">
                <div class="user-info">
                    <h3>Alex Morgan</h3>
                    <p class="status online">Online</p>
                </div>
            </div>
            
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search conversations...">
            </div>

            <div class="contacts-list">
                <div class="contact active">
                    <img src="https://pravatar.cc" alt="Avatar" class="avatar">
                    <div class="contact-details">
                        <div class="contact-header">
                            <h4>Jane Doe</h4>
                            <span class="time">10:42 AM</span>
                        </div>
                        <p class="last-message">Sounds good! See you at 5.</p>
                    </div>
                </div>

                <div class="contact">
                    <img src="https://pravatar.com" alt="Avatar" class="avatar">
                    <div class="contact-details">
                        <div class="contact-header">
                            <h4>John Smith</h4>
                            <span class="time">Yesterday</span>
                        </div>
                        <p class="last-message">Did you review the project files yet?</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN WINDOW: Chat Feed -->
        <main class="chat-window">
            
            <!-- Chat Header -->
            <header class="chat-header">
                <div class="active-contact">
                    <img src="https://pravatar.cc" alt="Jane" class="avatar">
                    <div>
                        <h4>Jane Doe</h4>
                        <p class="status">Typing...</p>
                    </div>
                </div>
                <div class="header-actions">
                    <button class="action-btn"><i class="fa-solid fa-phone"></i></button>
                    <button class="action-btn"><i class="fa-solid fa-video"></i></button>
                    <button class="action-btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                </div>
            </header>

            <!-- Chat Content Body -->
            <div class="chat-body">
                <div class="message incoming">
                    <div class="message-bubble">
                        Hey! Are we still meeting up for coffee later afternoon?
                        <span class="message-time">10:35 AM</span>
                    </div>
                </div>

                <div class="message outgoing">
                    <div class="message-bubble">
                        Yes, definitely! I am finishing up some work right now.
                        <span class="message-time">10:38 AM</span>
                    </div>
                </div>

                <div class="message incoming">
                    <div class="message-bubble">
                        Awesome! Let's meet at the usual spot downtown.
                        <span class="message-time">10:40 AM</span>
                    </div>
                </div>

                <div class="message outgoing">
                    <div class="message-bubble">
                        Sounds good! See you at 5.
                        <span class="message-time">10:42 AM</span>
                    </div>
                </div>
            </div>

            <!-- Chat Input Footer -->
            <footer class="chat-footer">
                <button class="attach-btn"><i class="fa-solid fa-plus"></i></button>
                <form class="input-form" onsubmit="event.preventDefault();">
                    <input type="text" class="message-input" placeholder="Type a message...">
                    <button type="submit" class="send-btn"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </footer>

        </main>
    </div>

</body>
</html>