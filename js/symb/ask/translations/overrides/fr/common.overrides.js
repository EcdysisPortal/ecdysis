//This file is for cutomization puropses only.
const overrides = {
header: 'Bonjour, utilisateur du portail !',
main: (content) => `
    <p>Ce portail s'appuie sur le Symbiota Support Hub (SSH) pour sa maintenance technique. Le financement fédéral du SSH a pris fin.</p>
    <p>La communauté ecdysis se mobilise pour réunir les 20 000 $ nécessaires au maintien annuel de notre portail. Nous vous invitons à soutenir le SSH et ecdysis, soit par un <a href="https://tinyurl.com/supportecdysis" target="_blank">don personnel déductible des impôts</a>, soit en <a href="https://forms.cloud.microsoft/r/6erqZiFZJu" target="_blank">demandant une facture</a> pour un soutien institutionnel.</p>
    <p>Merci beaucoup.<br>-${content.domain} et le SSH</p>`,
close: 'Fermer',
ask: 'Faire un don',
more_ways: 'Autres façons de soutenir le portail'
};
