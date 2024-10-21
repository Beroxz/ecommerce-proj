export function currencyUSD(value) {
  return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' })
    .format(value);
}

export default function currencyTHB(value) {
  return new Intl.NumberFormat('th-TH', { style: 'currency', currency: 'THB' })
    .format(value);
}
