//This file is for cutomization puropses only.
const overrides = {
    header: '¡Hola, usuario del portal!',
    main: (content) => `
        <p>Este portal depende del Symbiota Support Hub (SSH) para su mantenimiento técnico. La financiación federal para el SSH ha finalizado.</p>
        <p>La comunidad de ecdysis está trabajando para recaudar los 20 000 dólares necesarios para el mantenimiento anual de nuestro portal. Por favor, considere apoyar al SSH y a ecdysis, ya sea mediante una <a href="https://tinyurl.com/supportecdysis" target="_blank">donación personal deducible de impuestos</a> o <a href="https://forms.cloud.microsoft/r/6erqZiFZJu" target="_blank">solicitando una factura</a> para realizar una contribución institucional.</p>
        <p>Muchas gracias.<br>-${content.domain} y el SSH</p>`,
    close: 'Cerrar',
    ask: 'Donar',
    more_ways: 'Más Formas de Apoyar el Portal'
};
