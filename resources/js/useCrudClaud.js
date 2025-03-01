import axios from "axios";

export const useCrudClaud = () => {
    const cloudName = import.meta.env.VITE_CLOUDINARY_CLOUD_NAME;
    const preset = import.meta.env.VITE_CLOUDINARY_UPLOAD_PRESET;

    const uploadFileSinFirmar = async (file) => {
        const formData = new FormData();
        formData.append("file", file);
        formData.append("upload_preset", preset);
        formData.append("cloud_name", cloudName);
        try {
            const response = await axios.post(
                `https://api.cloudinary.com/v1_1/${cloudName}/image/upload`,
                formData
            );

            return response.data; // Retorna los datos obtenidos
        } catch (error) {
            console.error("Error en la subida:", error);
            return null; // Maneja el error devolviendo null
        }
    };

    return {
        uploadFileSinFirmar,
    };
};
