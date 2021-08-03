controlDesp();

function controlDesp(){
    // const transactionsUl         =  document.querySelector("#transactions");
const transactionsUlEntrada  =  document.querySelector("#entrada");
const transactionsUlSaida    =  document.querySelector("#saida");
const incomeDisplay          =  document.querySelector("#money-plus");
const expenseDisplay         =  document.querySelector("#money-minus");
const balanceDisplay         =  document.querySelector("#balance");
const form                   =  document.querySelector("#form");
const inputTransactionName   =  document.querySelector("#text");
const inputTransactionAmount =  document.querySelector("#amount");
const confDeletTransactions  =  document.querySelector(".conf-sim");

confDeletTransactions.addEventListener("click", () => {

    localStorage.removeItem('transactions');

    init();
    setTimeout(()=>{
        location.reload();
    }, 3000);
});

const localStorageTransactions = JSON.parse(localStorage
    .getItem('transactions'));

let transactions = localStorage
    .getItem('transactions') !== null ? localStorageTransactions : []

const removeTransaction = ID =>{
    transactions = transactions.filter(transaction =>
        transaction.id !== ID);
    
    updateLocalStorage('transactions', transactions);
    init();
}

const addTransactionIntoDOM = ({amount, name, id}) => {
    const operator = amount < 0 ? '-' : '+';
    const CSSClass = amount < 0 ? 'minus' : 'plus';
    const amountWithoutOperator = Math.abs(amount);
    const li = document.createElement('li');

    
    li.classList.add(CSSClass);
    li.innerHTML = `
        ${name} 
        <span>${operator} R$ ${amountWithoutOperator}</span>
        <button class="delete-btn" onClick="removeTransaction(${id})">x</button>
    `;
    if(CSSClass === 'plus'){
        transactionsUlEntrada.append(li);
    }else{
        transactionsUlSaida.append(li);
    }
}

const getExpenses = transactionsAmounts => Math.abs(transactionsAmounts
        .filter(values => values < 0)
        .reduce((accumulator, value) => accumulator + value, 0)
    ).toFixed(2);

const getIncome = transactionsAmounts => transactionsAmounts
    .filter(value => value > 0)
    .reduce((accumulator, value) => accumulator + value, 0)
    .toFixed(2);

const getTotal = transactionsAmounts => transactionsAmounts
    .reduce((accumulator, transaction) => accumulator + transaction, 0)
    .toFixed(2);

const uptateBalanceValues = () => {
    const transactionsAmounts = transactions.map(({ amount }) => amount);

    const total = getTotal(transactionsAmounts)
    const income =  getIncome(transactionsAmounts);
    const expense = getExpenses(transactionsAmounts);
    
    balanceDisplay.textContent = `R$ ${total}`;
    incomeDisplay.textContent = `R$ ${income}`;
    expenseDisplay.textContent = `R$ ${expense}`;
}

const init = () =>{
    transactionsUlEntrada.innerHTML = '';
    transactionsUlSaida.innerHTML = '';

    transactions.forEach(addTransactionIntoDOM);
    uptateBalanceValues();
}

init();

const generateID = () => Math.round(Math.random() * 1000);

const addToTransactionsArray = (transactionName, transactionAmount) => {

    transactions.push({
        id: generateID(),
        name: transactionName,
        amount: Number(transactionAmount)
    });
}

const cleanInputs = () =>{
    inputTransactionName.value = '';
    inputTransactionAmount.value = '';
}

const handleFormSubmit = event => {
    event.preventDefault();

    const transactionName = inputTransactionName.value.trim();
    const transactionAmount = inputTransactionAmount.value.trim();

    const isSomeInputEmpty = transactionName === '' || transactionAmount === '';

    if (isSomeInputEmpty){
        alert('Por favor preencha todos os dados de transação');
        return
    }

    addToTransactionsArray(transactionName, transactionAmount);
    
    init();
    updateLocalStorage('transactions', transactions);
    cleanInputs();
    
}

form.addEventListener('submit', handleFormSubmit);
}
