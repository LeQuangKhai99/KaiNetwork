import React from 'react';
import ReactDOM from 'react-dom';
import './bootstrap';
import HelloReact from './HelloReact';

function App() {
    return (
        <div className='main-container'>
            <HelloReact />
        </div>
    );
}

ReactDOM.render(
    <React.StrictMode>
        <App />
    </React.StrictMode>,
    document.getElementById('measurements-root')
);
