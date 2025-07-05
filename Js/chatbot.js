// Expanded Legal Database
const legalDatabase = {
    "IPC": {
        "302": {
            title: "IPC 302 - Murder",
            content: "Punishment: Death or life imprisonment with fine. Essential elements:",
            elements: ["Intention to cause death", "Knowledge of lethal consequences"],
            cases: ["Bachan Singh v. State of Punjab (1980)"]
        },
        "376": {
            title: "IPC 376 - Rape",
            content: "Punishment: Minimum 10 years imprisonment, extendable to life.",
            amendments: "Criminal Law (Amendment) Act, 2013",
            cases: ["Nirbhaya Case (2012)"]
        },
        "498A": {
            title: "IPC 498A - Cruelty by Husband/Relatives",
            content: "Punishment: Up to 3 years + fine. Includes:",
            elements: ["Willful conduct", "Harassment for dowry"],
            cases: ["Arnesh Kumar v. State of Bihar (2014)"]
        },
        "354": {
            title: "IPC 354 - Assault on Women",
            content: "Punishment: Up to 5 years + fine. Includes:",
            elements: ["Outraging modesty", "Physical contact without consent"]
        }
    },
    "Constitution": {
        "21": {
            title: "Article 21 - Right to Life",
            content: "Protects life and personal liberty. Includes:",
            rights: ["Right to privacy", "Right to clean environment", "Right to health"]
        },
        "32": {
            title: "Article 32 - Constitutional Remedies",
            content: "Right to move Supreme Court for enforcement of fundamental rights."
        }
    },
    "CrPC": {
        "154": {
            title: "Section 154 - FIR Registration",
            content: "Police must register FIR for cognizable offenses immediately."
        },
        "438": {
            title: "Section 438 - Anticipatory Bail",
            content: "Court can grant bail in anticipation of arrest."
        }
    },
    "Judgments": {
        "Vishaka": {
            title: "Vishaka v. State of Rajasthan (1997)",
            content: "Established guidelines against workplace sexual harassment."
        },
        "ShayaraBano": {
            title: "Shayara Bano v. UOI (2017)",
            content: "Declared triple talaq unconstitutional."
        }
    },
    "general": {
        "default": "I can explain: IPC sections, Constitution articles, Legal procedures. Try: 'Explain IPC 302' or 'Article 21'"
    }
};

// DOM Elements
const chatMessages = document.getElementById('chat-messages');
const userInput = document.getElementById('user-input');
const sendBtn = document.getElementById('send-btn');

// Show Typing Indicator
function showTyping() {
    const typing = document.createElement('div');
    typing.className = 'typing-indicator';
    typing.innerHTML = `
        <div class="typing-dot" style="animation-delay: 0s"></div>
        <div class="typing-dot" style="animation-delay: 0.2s"></div>
        <div class="typing-dot" style="animation-delay: 0.4s"></div>
    `;
    chatMessages.appendChild(typing);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Remove Typing Indicator
function removeTyping() {
    const indicators = document.querySelectorAll('.typing-indicator');
    indicators.forEach(indicator => indicator.remove());
}

// Create Message Element
function createMessage(content, isUser = false) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
    messageDiv.innerHTML = content;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Generate Legal Response
function generateResponse(query) {
    const lowerQuery = query.toLowerCase();
    
    // Check IPC sections
    const ipcMatch = lowerQuery.match(/ipc\s*(\d+[a-z]?)|section\s*(\d+)/i);
    if(ipcMatch) {
        const section = ipcMatch[1] || ipcMatch[2];
        if(legalDatabase.IPC[section]) {
            const data = legalDatabase.IPC[section];
            return `
                <div class="legal-card">
                    <div class="legal-title">${data.title}</div>
                    <div>${data.content}</div>
                    ${data.elements ? `<ul>${data.elements.map(e => `<li>${e}</li>`).join('')}</ul>` : ''}
                    ${data.cases ? `<em>Landmark Case: ${data.cases[0]}</em>` : ''}
                </div>
            `;
        }
    }

    // Check Constitution articles
    const constMatch = lowerQuery.match(/article\s*(\d+)/i);
    if(constMatch) {
        const article = constMatch[1];
        if(legalDatabase.Constitution[article]) {
            const data = legalDatabase.Constitution[article];
            return `
                <div class="legal-card">
                    <div class="legal-title">${data.title}</div>
                    <div>${data.content}</div>
                    ${data.rights ? `<ul>${data.rights.map(r => `<li>${r}</li>`).join('')}</ul>` : ''}
                </div>
            `;
        }
    }

    // Check Judgments
    if(lowerQuery.includes('vishaka')) {
        return formatJudgment(legalDatabase.Judgments.Vishaka);
    }
    if(lowerQuery.includes('shayara')) {
        return formatJudgment(legalDatabase.Judgments.ShayaraBano);
    }

    // Default response
    return `<div class="legal-card">${legalDatabase.general.default}</div>`;
}

function formatJudgment(judgment) {
    return `
        <div class="legal-card">
            <div class="legal-title">${judgment.title}</div>
            <div>${judgment.content}</div>
        </div>
    `;
}

// Handle User Input
async function handleSubmit() {
    try {
        const question = userInput.value.trim();
        if(!question) return;

        // Add user message
        createMessage(question, true);
        userInput.value = '';

        // Show typing indicator
        showTyping();

        // Simulate processing delay
        await new Promise(resolve => setTimeout(resolve, 800));
        removeTyping();

        // Generate and show response
        const response = generateResponse(question);
        createMessage(response);

    } catch (error) {
        console.error('Error:', error);
        createMessage("Sorry, I encountered an error. Please try again.");
    }
}

// Event Listeners
sendBtn.addEventListener('click', handleSubmit);
userInput.addEventListener('keypress', (e) => {
    if(e.key === 'Enter') handleSubmit();
});

// Initial Message
setTimeout(() => {
    createMessage(`
        <div class="legal-card">
            <div class="legal-title">Welcome to Legal AI Assistant</div>
            <div>
                I can help with:
                <ul>
                    <li>Indian Penal Code (IPC)</li>
                    <li>Constitution of India</li>
                    <li>Landmark Judgments</li>
                    <li>Legal Procedures</li>
                </ul>
                Try: "Explain IPC 302" or "Article 21"
            </div>
        </div>
    `);
}, 500);
