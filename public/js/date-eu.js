// date-eu.js

// Function to parse a date in dd/mm/yyyy format
function parseDateEU(dateString) {
    const parts = dateString.split('/');
    if (parts.length !== 3) return null;
    const day = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10) - 1; // Months are zero-based in JS
    const year = parseInt(parts[2], 10);

    return new Date(year, month, day);
}

// Function to format a date object to dd/mm/yyyy format
function formatDateEU(date) {
    const day = ("0" + date.getDate()).slice(-2);
    const month = ("0" + (date.getMonth() + 1)).slice(-2);
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
}

// Example usage
//const date = parseDateEU('25/12/2021');
//console.log(date); // Outputs: Sat Dec 25 2021 00:00:00 GMT+0000 (Coordinated Universal Time)
//console.log(formatDateEU(date)); // Outputs: 25/12/2021
