//This file is for cutomization puropses only.
const overrides = {
    header: 'Hello Portal User!',
    main: (content) => `
        <p>This portal relies on the Symbiota Support Hub (SSH) for website support. Federal funding for the SSH has ended.</p>
        <p>The ecdysis community is working to raise the $20,000 it costs to maintain our portal each year. Please consider supporting SSH and ecdysis either through a <a href="https://tinyurl.com/supportecdysis" target="_blank">tax-deductible personal donation</a> or by <a href="https://forms.cloud.microsoft/r/6erqZiFZJu" target="_blank">requesting an invoice</a> for institutional support.</p>
        <p>Thank you very much.<br>-${content.domain} and SSH</p>`,
    close: 'Close',
    ask: 'Donate',
    more_ways: 'More Ways to Support the Portal'
};
