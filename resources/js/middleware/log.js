export default function log({ next, to }) {
    console.log('[middleware/log]: ', to.name);
  
    return next();
  }