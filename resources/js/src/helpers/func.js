export function serverImage(size, imageUrl) {
    const regex = /\/\d{2,4}\//;
    return imageUrl.replace(regex, `/${size}/`);
};